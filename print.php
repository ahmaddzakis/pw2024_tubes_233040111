<?php

require_once __DIR__ . '/vendor/autoload.php';

session_start();
require "functions/fungsi.php";
$courses = query("SELECT *,
courses.id AS course_id,
courses.name AS course_name,
courses.image AS course_image,
courses.detail AS course_detail,
courses.teacher_name AS teacher_name,
categories.name AS category_name
FROM courses
LEFT JOIN categories ON categories.id = courses.category_id
LEFT JOIN teachers ON teachers.id = teacher_id
ORDER BY courses.id DESC");



$mpdf = new \Mpdf\Mpdf();

$html = '
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DAFTAR KURSUS PDF</title>
    <link rel="stylesheet" href="css/print.css">
  </head>
<table border"1" cellpadding="10" cellspacing="0">
<thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Image</th>
      <th scope="col">Course</th>
      <th scope="col">Teacher</th>
      <th scope="col">Category</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody>';
    

    $i = 1;
    foreach($courses as $course) {

      $html .= '<tr>
        <th scope="row">' . $i . '</th>
      <td><img src="img/' . $course["course_image"] . '" alt="" width="100px"></td>
      <td>' . $course['course_name'] . '</td>
      <td>' . $course['teacher_name'] . '</td> 
      <td>' . $course['category_name'] . '</td>
      <td>' . $course['course_detail'] . '</td> 
    </tr>';
     $i++;
    }

$html .= '</tbody>
</table>
</body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('daftar-kursus.pdf', \Mpdf\Output\Destination::INLINE);