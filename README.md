# PDFTron PHP Docker

Docker image for using [PDFTron for PHP](https://www.pdftron.com/documentation/php/guides/). 

## Images

Compiled with [PDFTron 8.1.0](https://www.pdftron.com/documentation/linux/changelog/). 

-	[viezel/pdftron-php7.4:8.1.0](https://github.com/viezel/pdftron-php-docker/blob/master/7.4/Dockerfile)
-	NOT READY [viezel/pdftron-php8.0:8.1.0](https://github.com/viezel/pdftron-php-docker/blob/master/8.0/Dockerfile)

**Notice: No support for PHP8 in SWIG yet**

## How to use PDFTron in PHP

Please see Example folder. PDFTron for PHP is generated with SWIG.

## How to build

If you want to customize it, then pull down the repo and build it:

```
cd 8.0
docker build --no-cache -t viezel/pdftron-php8.0:8.1.0 -f Dockerfile . --no-cache
docker push viezel/pdftron-php8.0:8.1.0
```