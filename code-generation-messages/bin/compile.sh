#!/usr/bin/env sh

# TODO: Only pipe to `src/Acme/OnlineShop/messages.php` when command returned with exit code 0
bin/generate-code.php src/Acme/OnlineShop/messages.yaml messages > src/Acme/OnlineShop/messages.php
