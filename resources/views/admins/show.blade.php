<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show User</title>
</head>
<body>
    <h1>User Details</h1>
    <p>ID: {{ $user->id }}</p>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

    <a href="{{ route('admins.index') }}">Back to List</a>
</body>
</html>
