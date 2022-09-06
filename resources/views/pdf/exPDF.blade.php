<!DOCTYPE html>
<html lang="ar">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	

<h3>تقارير المعاملات الواردة </h3>
<table dir="rtl" >
<tr>
    <th>رقم المعاملة </th>
    <th>عنوان المعاملة</th>
    <th>القسم المُرسل إليه</th>
    <th>تاريخ المعاملة</th>
    <th>الحالة</th>
</tr>
@for($i=0; $i<Count($data); $i++)
  <tr>
    <td>{{$data[$i]->num}}</td>
	<td>{{$data[$i]->title}}</td>
	<td>{{$data[$i]->d1->name}}</td>
	<td>{{$data[$i]->date}}</td>
	<td>{{$data[$i]->status}}</td>

  </tr>
@endfor  
</table>

@for($i=0; $i<Count($data); $i++)
<hr>

 <h3>  {{$data[$i]->num}} :تفاصيل معاملة رقم </h3>
<p>
{{$data[$i]->notes}} :ملاحظات
<br>
اسم الموظف المُرسِل: {{$data[$i]->sender_name}} 
<br>
حالة المعاملة:{{$data[$i]->status}} 
<br>
<br>

<h1> تفاصيل الرد على المعاملة </h1>

ملاحظات : {{$data[$i]->im->comment}} 
<br>

اسم الموظف :{{$data[$i]->im->receiver_name}} 
<br>
تاريخ الرد على المعاملة: {{$data[$i]->im->received_date}} 




</p>

@endfor  
</body>
</html>