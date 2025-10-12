<html>

<style>
:root {
  --primary-color: #04AA6D;
  --primary-color-hover: #45a049;
  --border-color: #ccc;
  --background-color: #f2f2f2;
  --font-family: 'Arial', 'Helvetica', sans-serif;
  --padding: 1rem;
  --border-radius: 0.375rem; 
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  font-family: monospace;
  margin: 0;
  padding: 10rem;
  background-color: #fff;
  color: #333;
  background-color: #e2fff5;

}

input[type="text"],
select,
textarea {
  width: 100%;
  padding: var(--padding);
  border: 1px solid var(--border-color);
  border-radius: var(--border-radius);
  margin-top: 0.375rem; /* 6px */
  margin-bottom: 1rem;  /* 16px */
  resize: vertical;
  font-size: 1rem;
  font-family: inherit;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input[type="text"]:focus,
select:focus,
textarea:focus {
  outline: none;
  border-color: var(--primary-color);
  box-shadow: 0 0 0 3px rgba(4, 170, 109, 0.3);
}

input[type="submit"] {
  background-color: var(--primary-color);
  color: #fff;
  padding: 0.75rem 1.25rem; /* 12px 20px */
  border: none;
  border-radius: var(--border-radius);
  cursor: pointer;
  font-size: 1rem;
  font-weight: 600;
  transition: background-color 0.3s ease;
  width: -webkit-fill-available;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
  background-color: var(--primary-color-hover);
  outline: none;
}

h3 {
    text-align: center;
    font-size: 30px;
}

label{
    font-size: 16px;
    font-weight: 600;
}


@keyframes rotate {
  100% {
    transform: rotate(1turn);
  }
}

.container {
  position: relative;
  z-index: 0;
  background-color: white;
  padding: 2.25rem 1.25rem 1.5rem;
  border-radius: 0.5rem;
  max-width: 600px;
  margin: 1rem auto;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  overflow: hidden;
}

/* Animated rainbow border */
.container::before {
  content: '';
  position: absolute;
  z-index: -2;
  left: -50%;
  top: -50%;
  width: 200%;
  height: 200%;
  background-repeat: no-repeat;
  background-size: 50% 50%, 50% 50%;
  background-position: 0 0, 100% 0, 100% 100%, 0 100%;
  background-image: 
    linear-gradient(#399953, #399953),
    linear-gradient(#fbb300, #fbb300),
    linear-gradient(#d53e33, #d53e33),
    linear-gradient(#377af5, #377af5);
  animation: rotate 4s linear infinite;
}

/* Inner white box to create border effect */
.container::after {
  content: '';
  position: absolute;
  z-index: -1;
  left: 6px;
  top: 6px;
  width: calc(100% - 12px);
  height: calc(100% - 12px);
  background: var(--background-color, #f2f2f2); /* fallback if var not defined */
  border-radius: 0.5rem;
}



</style>
</head>
<body>

<h3>Contact Form 👤</h3>

<div class="container">
  <form action="process.php" method="post">
    <label for="name">Name</label>
    <input type="text" id="fname" name="name" required placeholder="Your name..">

    <label for="age">Age</label>
    <input type="text" id="age" name="age" placeholder="Your age.." required>

    <label for="gender">Gender</label>
    <select id="gender" name="gender">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
