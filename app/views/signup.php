<style>
        html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: #557F8B;
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.3);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form .sub {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #528BA6;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px;
  background-color: #D6F0EF;
  border: none;
}

.login-box .sub:hover {
  background-color :#528BA6;
  color : #D6F0EF;
  border-radius: 5px;

}

.login-box .sub span {
  position: absolute;
  display: block;
}
.login-box .lien{
  margin : 10px 0;
  
}
a{
  color : #D6F0EF;
}
  </style>

<div class="login-box">
  <h2>Inscrivez-vous</h2>
  <form method="post">
    <div class="user-box">
      <input type="text" name="lname" required="">
      <label>Nom</label>
    </div>
    <div class="user-box">
      <input type="text" name="fname" required="">
      <label>prenom</label>
    </div>
    <div class="user-box">
      <input type="text" name="email" required="">
      <label>email</label>
    </div>
    <div class="user-box">
      <input type="password" name="pwd" required="">
      <label>mot de passe</label>
    </div>
    <button type="submit" name="submit" class="sub">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      regitre
      </button>
      <div ><a class="link-light mt-4" href="/login">Inscrivez-vous</a></div>
      

  </form>
</div>
