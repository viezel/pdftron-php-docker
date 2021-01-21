FROM viezel/php:7.4

MAINTAINER Mads Møller

RUN apt-get update \
    && apt-get upgrade -yq \
    && apt-get install -yq --no-install-recommends \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        openssh-server \
        swig \
        cmake \
        wget \
        git \
        cron \
        nano

# Install PDFTron
RUN mkdir ~/PDFNetPHPSetup && \
    # Download PDFNetWrappers
    cd ~/PDFNetPHPSetup && wget https://github.com/PDFTron/PDFNetWrappers/archive/master.tar.gz && \
    tar xzvf master.tar.gz && \
    # Move to the correct folder
    cd PDFNetWrappers-master/PDFNetC && \
    # Download the PDFNet library
    wget http://www.pdftron.com/downloads/PDFNetC64.tar.gz && \
    tar xzvf PDFNetC64.tar.gz && \
    # Prepare for compilation
    mv PDFNetC64/Headers/ . && mv PDFNetC64/Lib/ . && \
    cd .. && mkdir Build && cd Build && \
    # Compiling...
    cmake -D BUILD_PDFNetPHP=ON .. && make && make install && \
    # Copy the build
    cp -r /root/PDFNetPHPSetup/PDFNetWrappers-master/Build/lib/ /PDFNetPHP/ && \
    cp /root/PDFNetPHPSetup/PDFNetWrappers-master/PDFNetC/Lib/libPDFNetC.so /PDFNetPHP/libPDFNetC.so && \
    # Installing the PHP extension
    echo -e "\nextension=/PDFNetPHP/PDFNetPHP.so" >> /etc/php/7.4/cli/php.ini && \
    echo -e "\nextension=/PDFNetPHP/PDFNetPHP.so" >> /etc/php/7.4/fpm/php.ini

RUN apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*