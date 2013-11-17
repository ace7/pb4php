pb4php
======

Protocol Buffer for PHP (supported *packed repeated fields*)

Fork of https://code.google.com/p/pb4php/

As listed in https://code.google.com/p/protobuf/wiki/ThirdPartyAddOns, there are 3 recommend PHP implementation of Protocol Buffer:
* http://code.google.com/p/pb4php/
* https://github.com/allegro/php-protobuf/
* https://github.com/chobie/php-protocolbuffers

Both the 1st and 2nd don't support *packed repeated fields*, while the 3rd claimed that it supports, but when I tried with my proto file, obviously there are some other bugs, so I gave up.

This left me no choice, so I made some changes to pb4php to support *packed repeated fields*, and now it's used in production system. I can't guarantee that my change is fully implementation and no bugs, so use it with cautious and report bugs to me in case of any.

For more information about *packed repeated fields*, please ref to https://developers.google.com/protocol-buffers/docs/encoding

:-)
