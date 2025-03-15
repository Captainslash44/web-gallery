import React from "react";
import Button from "../components/Button";
import LabelInput from "../components/Input";

const Login = () => {
  return (
    <body className="flex justify-center align-center">
      <div className="login-form flex column space-between primary-bg rounded-border align-center box-shadow-blue pl">
        <header className="flex justify-center">
          <h2>Login</h2>
        </header>
        <div className="input-container space-between flex column align-center">
          <LabelInput placeholder="Email" label="Email" />
          <LabelInput placeholder="Password" label="Password" />
        </div>

        <footer className="flex column align-center space-between">
          <Button text="Login" />
        </footer>
        <p>
          Don't have an account? <a href="./signup">Signup</a>
        </p>
      </div>
    </body>
  );
};

export default Login;
