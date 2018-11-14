<!doctype html>
<html>
<head>
	<meta charset="utf-8"></meta>
<style>
	* {box-sizing: border-box;}
body {
  background: #e6f4fd;
  font-family: 'Roboto', sans-serif;
}
.ui-form {
  max-width: 350px;
  padding: 80px 30px 30px;
  margin: 50px auto 30px;
  background: white;
}
.ui-form h3 {
  position: relative;
  z-index: 5;
  margin: 0 0 60px;
  text-align: center;
  color: #4a90e2;
  font-size: 30px;
  font-weight: normal;
}

.form-row {
  position: relative;
  margin-bottom: 40px;
}
.form-row input {
  display: block;
  width: 100%;
  padding: 0 10px;
  line-height: 40px;
  font-family: 'Roboto', sans-serif;
  background: none;
  border-width: 0;
  border-bottom: 2px solid #4a90e2;
  transition: all 0.2s ease;
}
.form-row label {
  position: absolute;
  left: 13px;
  color: #9d959d;
  font-size: 20px;
  font-weight: 300;
  transform: translateY(-35px);
  transition: all 0.2s ease;
}
.form-row input:focus {
  outline: 0;
  border-color: rgba(248,0,255,1.00);
}
.form-row input:focus + label, 
.form-row input:valid + label {
  transform: translateY(-60px);
  margin-left: -14px;
  font-size: 14px;
  font-weight: 400;
  outline: 0;
  border-color: rgba(248,0,255,1.00);
  color:rgba(248,0,255,1.00);
}
.ui-form input[type="submit"] {
  width: 100%;
  padding: 0;
  line-height: 42px;
  background: #4a90e2;
  border-width: 0;
  color: white;
  font-size: 20px;
}
.ui-form p {
  margin: 0;
  padding-top: 10px;
}
	.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #2196F3;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color:rgba(255,133,239,1.00)
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}
.custom-dropdown {
  position: relative;
  display: inline-block;
  vertical-align: middle;
top: -20px;
  margin: 10px; /* demo only */
}

.custom-dropdown select {
  background-color:#2196F3;
  color: #fff;
  font-size: inherit;
  padding: .5em;
  padding-right: 2.5em; 
  border: 0;
  margin: 0;
  border-radius: 3px;
  text-indent: 0.01px;
  text-overflow: '';
  
  -webkit-appearance: button; /* hide default arrow in chrome OSX */
}

.custom-dropdown::before,
.custom-dropdown::after {
  content: "";
  position: absolute;
  pointer-events: none;
}

.custom-dropdown::after { /*  Custom dropdown arrow */
  content: "\25BC";
  height: 1em;
  font-size: .625em;
  line-height: 1;
  right: 1.2em;
  top: 50%;
  margin-top: -.5em;
}

.custom-dropdown::before { /*  Custom dropdown arrow cover */
  width: 2em;
  right: 0;
  top: 0;
  bottom: 0;
  border-radius: 0 3px 3px 0;
}

.custom-dropdown select[disabled] {
  color: rgba(0,0,0,.3);
}

.custom-dropdown select[disabled]::after {
  color: rgba(0,0,0,.1);
}

.custom-dropdown::before {
  background-color: rgba(0,0,0,.15);
}

.custom-dropdown::after {
  color: rgba(0,0,0,.4);
}
	

</style>	
</head>
<body>
	
 
	<form action="stats.php" method="POST" class="ui-form">
  <h3>Введите данные для поиска</h3>
   <div class="form-row">
    <input type="text" name = "name" id="name" required autocomplete="off"><label for="name">Имя</label>
  </div>
  <div class="form-row">
    <input type="text" name = "surname" id="surname" required autocomplete="off"><label for="surname">Фамилия</label>
  </div>
 <div class="form-row">
    <input type="text" name = "age" id="age" required autocomplete="off"><label for="age">Год рождения</label>
  </div>
 <div class="form-row">
    <input type="text" name = "coacher" id="coacher" required autocomplete="off"><label for="coacher">Тренер</label>
  </div>
	 <span class="custom-dropdown">
    <select id="dis" name="dis">
        <option disabled>Выберите дистанцию</option>
    <option value="50 вольный">50м вольный</option>
    <option value="100 вольный">100м вольный</option>
    <option value="200 вольный">200м вольный</option>
	<option value="400 вольный">400м вольный</option>
    <option value="800 вольный">800м вольный</option>
    <option value="1500 вольный">1500м вольный</option>
	<option value="50 на спине">50м на спине</option>
    <option value="100 на спине">100м на спине</option>
    <option value="200 на спине">200м на спине</option>
	<option value="50 баттерфляй">50м баттерфляй</option>
    <option value="100 баттерфляй">100м баттерфляй</option>
    <option value="200 баттерфляй">200м баттерфляй</option>
	<option value="100 комплексное плвание">100м комплексное плавание</option>
    <option value="200 комплексное плвание">200м комплексное плавание</option>
    <option value="400 комплексное плвание">400м комплексное плавание</option>
    </select>
</span>
<label class="container">25м
  <input type="radio" name="type" value="25">
  <span class="checkmark"></span>
</label>
<label class="container">50м
  <input type="radio" name="type" value="50">
  <span class="checkmark"></span>
</label>
		
  <p><input type="submit" value="Найти"></p>
	
</form>
</body>

	
</html>