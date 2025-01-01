<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-IjEjr1f+KNUld7Mi1M4cULRCUZCKhAX9kLb0wRQNYE4TG4vvKLMxsBxwBlXYyjP3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-DkAoUQSzG4z77As+PYZIMLU28mzkDxAeqMYyXr0S9Ih5lEWYkK5itxd9BLAXzY3i" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <title>User Details Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .form-container h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #555;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    .form-group textarea {
      resize: none;
      height: 80px;
    }

    .form-group input:focus,
    .form-group textarea:focus {
      border-color: #007bff;
      outline: none;
      box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
    }

    .form-group button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 18px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>User Details Form</h2>
  @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  <form action="{{route('user.save')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Enter your full name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input id="address" name="address" placeholder="Enter your address" value="{{ old('address') }}">
    </div>
    <div class="form-group">
      <label for="contact">Contact Number</label>
      <input type="tel" id="contact" name="contact" placeholder="Enter your contact number" value="{{ old('contact') }}">
    </div>
    <div class="form-group">
      <label for="contact">User Image</label>
      <input type="file" id="myfile" name="img">
    </div>
    <div class="form-group">
      <button type="submit">Submit</button>
    </div>
  </form>
</div>

</body>
</html>
