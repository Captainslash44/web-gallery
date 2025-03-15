import React from "react";
import LabelInput from "../components/Input";
import Button from "../components/Button";

const Signup = () => {
  return (
    <body className="flex justify-center align-center">
      <div className="register-form flex column space-between primary-bg rounded-border align-center box-shadow-blue pl">
        <header>
          <h2>Register</h2>
        </header>
        <div className="signup-input-container flex column space-between align-center">
          <LabelInput placeholder="Full Name" label="Full Name" />
          <LabelInput placeholder="Email" label="Email" />
          <LabelInput placeholder="Password" label="Password" />
          <LabelInput placeholder="Confirm Password" label="Confirm Password" />
        </div>
        <Button text="Signup" />
        <footer>
          <p>
            Already have an account? <a href="./login">Sign in</a>
          </p>
        </footer>
      </div>
    </body>
  );
};

export default Signup;
