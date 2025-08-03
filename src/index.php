<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>簡単な計算アプリ</title>
</head>

<body>
  <h1>簡単な計算アプリ</h1>
  <form action="calculate.php" method="post">
    <input type="number" name="num1" placeholder="最初の数値" required>
    <select name="operation">
      <option value="add">+</option>
      <option value="subtract">-</option>
      <option value="multiply">×</option>
      <option value="divide">÷</option>
    </select>
    <input type="number" name="num2" placeholder="次の数値" required>
    <button type="submit">計算</button>
  </form>
</body>

</html>