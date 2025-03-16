import React from "react";
import LabelInput from "../components/Input";
import Button from "../components/Button";
import { useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";

const Signup = () => {
  const navigate = useNavigate();

  const [form, setForm] = useState({
    fullname: "",
    email: "",
    password: "",
    confirm_pass: "",
  });

  const data = new FormData();
  data.append("fullname", form.fullname);
  data.append("email", form.email);

  const register = async () => {
    if (form.password !== form.confirm_pass) {
      alert("passwords don't match");
      return;
    } else {
      data.append("password", form.password);
    }
    const response = await axios.post(
      "http://localhost/web-gallery/server/signup",
      data
    );
    if (response.data === false) {
      alert("User already exists");
    } else {
      navigate("/login");
    }
  };

  return (
    <div className="flex justify-center align-center full-height">
      <div className="register-form flex column space-between primary-bg rounded-border align-center box-shadow-blue pl">
        <header>
          <h2>Register</h2>
        </header>
        <div className="signup-input-container flex column space-between align-center">
          <LabelInput
            placeholder="Full Name"
            label="Full Name"
            onChange={(e) => {
              setForm({ ...form, fullname: e.target.value });
            }}
          />
          <LabelInput
            placeholder="Email"
            label="Email"
            onChange={(e) => {
              setForm({ ...form, email: e.target.value });
            }}
          />
          <LabelInput
            placeholder="Password"
            label="Password"
            onChange={(e) => {
              setForm({ ...form, password: e.target.value });
            }}
          />
          <LabelInput
            placeholder="Confirm Password"
            label="Confirm Password"
            onChange={(e) => {
              setForm({ ...form, confirm_pass: e.target.value });
            }}
          />
        </div>

        <Button text="Signup" onClick={register} />
        <footer>
          <p>
            Already have an account? <a href="./login">Sign in</a>
          </p>
        </footer>
      </div>
    </div>
  );
};

export default Signup;
