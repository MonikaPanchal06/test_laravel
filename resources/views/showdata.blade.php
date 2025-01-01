<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DataTable Example</title>
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
  </style>
</head>
<body>

<h2>User Table</h2>
<table id="example" class="display" style="width:100%">
  <thead>
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Address</th>
      <th>Contact No</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @php
        $i = 1;
  @endphp
  @foreach($users as $user)
    <tr>
      <td>{{ $i++ }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->address }}</td>
      <td>{{ $user->contact }}</td>
      <td>
      <img src="{{ $user->image }}" alt="User Image" width="50" height="50">
       </td>
      <td>
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
        <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      "pageLength": 10,
      "lengthMenu": [5, 10, 25, 50, 100],
      "language": {
        "search": "Search:"
      }
    });
  });
</script>

</body>
</html>
