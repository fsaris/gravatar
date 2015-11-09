=================================================================
EXT:gravatar AvatarProvider for Gravatar support in TYPO3 backend
=================================================================

Install extension and that's it. Gravatar support is enabled for BE users with a email address set and no avatar image.

By default Gravatar is only used when a user hasn't an avatar image linked to his account an email address set.
But optional the email address check can be disabled so also BE users without email address set can get a
generated images provided by Gravatar.


**How to use:**

1. Download and install gravatar in the extension manager
   Or use composer ``composer require minifranske/gravatar`` and install extension in the extension manager

2. *Optional (by default the Gravatar service is now enabled and will be used for BE users without avatar image and with email address set):*

   Set a fallback behaviour thought extensions configuration (see extension manager)


**Features:**

- Supports all fallback options provided by Gravatar.com see https://www.gravatar.com/site/implement/images/
- Can also be used to show generated Gravatar image for BE users without email address

**Requirements:**
    TYPO3 >= 7.5
