<?php

class Laporan extends Main
{
    public function selectReport($value1, $value2)
    {
        return $data = $this->_DB->getWhereBetween('pembelian', 'tanggal', $value1, $value2);
    }
}
