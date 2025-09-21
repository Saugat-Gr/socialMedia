
<!doctype html>
<html>
<head><meta charset="utf-8"><title>CSRF test</title></head>
<body>
  <h3>CSRF test form</h3>
  <form method="POST" action="/test-submit">
    @csrf
    <input name="title" placeholder="type something" />
    <button type="submit">Submit</button>
  </form>
</body>
</html>
