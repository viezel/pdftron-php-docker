<?php

namespace {
    // PDFTron is generated with SWIG - atm we do not have namespaces.
    // Therefore, we need to use the global namespace
    include("/PDFNetPHP/PDFNetPHP_core.php");
}

namespace App {

    // these use statements are PDFTron classes
    use Convert;
    use PDFDoc;
    use PDFNet;
    use SDFDoc;

    class MyExampleClass
    {
        public function doSomething(): void
        {
            PDFNet::Initialize();

            $this->convertImageToPdf();
        }

        private function convertImageToPdf(): string
        {
            $inputFile = './somepath/testfile.png';
            $outputFile = './somepath/output/outputfile.pdf';

            $pdfdoc = new PDFDoc();
            Convert::ToPdf($pdfdoc, $inputFile);

            $pdfdoc->Save($outputFile, SDFDoc::e_compatibility);
            $pdfdoc->Close();

            return $outputFile;
        }
    }
}