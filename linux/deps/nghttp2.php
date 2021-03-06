<?php 
    $this->req("libressl");
?>
# nghttp2
RUN cd <?php if($this->builddir) { echo $this->builddir; } else { ?>/work/nghttp2<?php } ?> && \
    ./configure <?php if($this->confargs) { echo $this->confargs; } else { ?>--prefix=/usr --enable-shared=no --enable-static=yes --disable-python-bindings<?php } ?> && \
    make <?php if($this->makeargs) { echo $this->makeargs; } else { ?>-j`nproc`<?php } ?> && \
    make install

<?php $this->lib("/usr/lib/libnghttp2.a", ["/usr/lib/libssl.a"]);?>
