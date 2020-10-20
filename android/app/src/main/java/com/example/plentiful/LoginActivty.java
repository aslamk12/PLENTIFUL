package com.example.plentiful;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.widget.EditText;
import android.widget.Button;
import android.widget.TextView;
import android.widget.ProgressBar;
import android.util.Log;
import android.util.Patterns;
import android.view.View;
import android.widget.Toast;
import android.os.Handler;

import android.os.Bundle;

public class LoginActivty extends AppCompatActivity {
    EditText email,password;
    Button login;
    TextView forgot_pass,register;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        email=(EditText)findViewById(R.id.usernameLogin);
        password=(EditText)findViewById(R.id.passwordLogin);
        login=(Button)findViewById(R.id.loginButton);
        forgot_pass=(TextView)findViewById(R.id.forgotPassword);
        register=(TextView)findViewById(R.id.newUserRegistration);


        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(LoginActivty.this,MainActivity.class);
                startActivity(regIntent);

            }
        });

    }



}