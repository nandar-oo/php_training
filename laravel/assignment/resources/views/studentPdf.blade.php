<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table {
      margin: auto;
      width: 100%;
      border: 1px solid black;
      border-collapse: collapse;
    }

    th {
      background-color: #696969;
      color: #fff;
    }

    th,
    td {
      padding: 10px 0px;
      border: 1px solid black;
      text-align: center;
    }

    th {
      padding: 15px 0px;
    }
  </style>
</head>

<body>
  <h1>Student List</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Major</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->major->name }}</td>
        <td>{{ $item->city }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
