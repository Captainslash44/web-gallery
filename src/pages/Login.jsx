import React from "react";
import Button from "../components/Button";
import LabelInput from "../components/Input";
import { useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";
// import { request } from "../remote/axios";
// import { requestMethods } from "../enums/requestMethods";

const Login = () => {
  const [form, setForm] = useState({
    email: "",
    password: "",
  });

  const navigate = useNavigate();

  const data = new FormData();
  data.append("email", form.email);
  data.append("password", form.password);

  const checkCredentials = async () => {
    const response = await axios.post(
      "http://localhost/web-gallery/server/login",
      data
    );
    if (!response.data["status"]) {
      console.log("wrong credentials");
    } else {
      console.log(response.data);
      localStorage.setItem("name", response.data["name"]);
      navigate("/home");
    }
  };

  return (
    <div className="flex align-center justify-center full-height">
      <div className="login-form flex column space-between primary-bg rounded-border align-center box-shadow-blue pl">
        <header className="flex justify-center">
          <h2>Login</h2>
        </header>
        <div className="input-container space-between flex column align-center">
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
        </div>
        <footer className="flex column align-center space-between">
          <Button text="Login" onClick={checkCredentials} />
        </footer>
        <p>
          Don't have an account? <a href="./signup">Signup</a>
        </p>
      </div>
    </div>
  );
};

export default Login;
