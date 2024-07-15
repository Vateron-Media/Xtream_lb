<?php

class CB367Ff73bf6c43C6b176770e3ADCDd3
{
    private $binaryFormatMajorVersion;
    private $binaryFormatMinorVersion;
    private $buildEpoch;
    private $databaseType;
    private $description;
    private $ipVersion;
    private $languages;
    private $nodeByteSize;
    private $nodeCount;
    private $recordSize;
    private $searchTreeSize;
    public function __construct($A917cfa0f27208d0c0649f999e3f24a3)
    {
        $this->binaryFormatMajorVersion = $A917cfa0f27208d0c0649f999e3f24a3["binary_format_major_version"];
        $this->binaryFormatMinorVersion = $A917cfa0f27208d0c0649f999e3f24a3["binary_format_minor_version"];
        $this->buildEpoch = $A917cfa0f27208d0c0649f999e3f24a3["build_epoch"];
        $this->databaseType = $A917cfa0f27208d0c0649f999e3f24a3["database_type"];
        $this->languages = $A917cfa0f27208d0c0649f999e3f24a3["languages"];
        $this->description = $A917cfa0f27208d0c0649f999e3f24a3["description"];
        $this->ipVersion = $A917cfa0f27208d0c0649f999e3f24a3["ip_version"];
        $this->nodeCount = $A917cfa0f27208d0c0649f999e3f24a3["node_count"];
        $this->recordSize = $A917cfa0f27208d0c0649f999e3f24a3["record_size"];
        $this->nodeByteSize = $this->recordSize / 4;
        $this->searchTreeSize = $this->nodeCount * $this->nodeByteSize;
    }
    public function __get($ecd0d66f263e08daf7b731e770eae6b6)
    {
        return $this->{$ecd0d66f263e08daf7b731e770eae6b6};
    }
}
