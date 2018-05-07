<?php

if (! function_exists('getOldOrField')) {
    function getOldOrField($model = null, $fieldName)
    {
        if ($model === null) {
            return old($fieldName);
        }

        return old($fieldName) ? old($fieldName) : $model->$fieldName;
    }
}

if (! function_exists('loadCSV')) {
    // ถ้ายังไม่มีก็ประกาศ function ได้
    // อ่านไฟล์ csv แล้วแปลงเป็น associative array
    function loadCSV($fileName) {
        // ไฟล์ csv ต้องเก็บไว้ที่ storage/csv
        $fileName = storage_path(). '/csv/' . $fileName . '.csv';
        
        // check ก่อนว่าไฟล์นี้มีจริงและอ่านได้ด้วย ถ้าไม่ได้ก็เลิก
        if(!file_exists($fileName) || !is_readable($fileName))
            return FALSE;
        else {
            $header = NULL; // คือ headrow เก็บ ชื่อ filed นั่นเอง
            $data = array(); // เอาไว้เก็บข้อมูลจกไฟล์
            $count = 0;
            // เช็คก่อนว่า เปิดอ่านได้ไหม ส่วน 'r' = read only
            if (($handle = fopen($fileName, 'r')) !== FALSE){
                // วนลูปตามจำนวณ row ที่ได้จาก fgetcsv ส่วน 3000 คือค่าสูงสุดของจำนวณ chars ใน 1 row
                while (($row = fgetcsv($handle, 3000, ",")) !== FALSE){
                    if(!$header) // ถ้า $header ยังว่างอยู่
                        $header = $row; // ดังนั้น $header = row แรก
                    else 
                        // $row ต่อๆมาก็จะเป็น data จึงให้ combine กับ $header เป็น associate array แล้วใส่ใน $data
                        $data[] = array_combine($header, $row);
                }
            }
            fclose($handle); // ปิดไฟล์
            return $data;
        }
    }
}
