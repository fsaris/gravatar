<?php

namespace MiniFranske\Gravatar\Controller;

use TYPO3\CMS\Core\Http\Request;
use TYPO3\CMS\Core\Http\Response;
use TYPO3\CMS\Core\Http\Stream;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ProxyController
{

    public function proxyAction(Request $request, Response $response)
    {
        $params = $request->getQueryParams();

        if (!isset($params['md5'], $params['size'], $params['d'])) {
            throw new \Exception('Missing gravatar parameters', 1470912686);
        }

        $md5 = $params['md5'];
        $size = $params['size'];
        $d = $params['d'];
        $uri = 'https://www.gravatar.com/avatar/' . $md5 . '?s=' . $size . '&d=' . urlencode($d);

        $headers = [];
        if ($request->getHeaderLine('If-Modified-Since')) {
            $headers[] = 'If-Modified-Since: ' . $request->getHeaderLine('If-Modified-Since');
        }

        $report = false;
        // request image from gravatar
        $result = GeneralUtility::getUrl($uri, 1, $headers, $report);
        // Header and content are separated by an empty line
        list($header, $body) = explode(CRLF . CRLF, $result, 2);

        if ($report['http_code'] == 304) {
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
        $headerArr = preg_split('/\\r|\\n/', $header, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($headerArr as $header) {
            foreach ($passHeaders as $h) {
                if (preg_match('/^' . $h . ':/i', $header)) {
                    list($headerName, $headerValue) = explode(':', $header, 2);
                    $response = $response->withAddedHeader($headerName, $headerValue);
                }
            }
        }

        if ($body) {
            // response needs a stream instead of a string
            $bodyStream = fopen('php://memory','r+');
            fwrite($bodyStream, $body);
            rewind($bodyStream);
            $bodyStream = new Stream($bodyStream);
            $response = $response->withBody($bodyStream);
        }

        return $response;
    }
}