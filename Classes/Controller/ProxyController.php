<?php
namespace MiniFranske\Gravatar\Controller;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use GuzzleHttp\Client;
use TYPO3\CMS\Core\Http\Request;
use TYPO3\CMS\Core\Http\Response;

/**
 * Class ProxyController
 */
class ProxyController
{

    /**
     * @param Request $request
     * @param Response $response
     * @return \TYPO3\CMS\Core\Http\Message|Response
     * @throws \Exception
     */
    public function proxyAction(Request $request, Response $response)
    {
        $params = $request->getQueryParams();

        if (!isset($params['md5'], $params['size'], $params['d'])) {
            throw new \Exception('Missing gravatar parameters', 1470912686);
        }

        $uri = '/avatar/'
            . urlencode($params['md5'])
            . '?s=' . urlencode($params['size'])
            . '&d=' . urlencode($params['d']);

        $client = new Client(['base_uri' => 'https://www.gravatar.com']);

        $options = [];
        if ($request->getHeaderLine('If-Modified-Since')) {
            $options['headers']['If-Modified-Since'] = $request->getHeaderLine('If-Modified-Since');
        }

        // request image from gravatar
        $result = $client->get(
            $uri,
            $options
        );

        if ($result->getStatusCode() === 304) {
            $response = $response->withStatus(304, 'Not Modified');
        }

        // Forward these response headers to the client
        $passHeaders = [
            'content-disposition',
            'content-type',
            'date',
            'expires',
            'last-modified',
        ];

        foreach ($passHeaders as $headerName) {
            $headerValue = $result->getHeader($headerName);
            if ($headerValue !== []) {
                $response = $response->withAddedHeader($headerName, $headerValue);
            }
        }

        $body = $result->getBody();
        if ($body) {
            $response = $response->withBody($body);
        }

        return $response;
    }
}
