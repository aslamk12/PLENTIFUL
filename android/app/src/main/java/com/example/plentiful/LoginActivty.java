package com.example.plentiful;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.AsyncTask;
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

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class LoginActivty extends AppCompatActivity {
    EditText email,password;
    Button login;
    TextView register;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        email=(EditText)findViewById(R.id.usernameLogin);
        password=(EditText)findViewById(R.id.passwordLogin);
        login=(Button)findViewById(R.id.loginButton);
        register=(TextView)findViewById(R.id.newUserRegistration);


        if(SharedPrefManager.getInstance(this).isLoggedIn())
        {
            Intent homeIntent = new Intent(LoginActivty.this,HomeActivity.class);
            startActivity(homeIntent);
        }

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                validate();

            }
        });

        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(LoginActivty.this,MainActivity.class);
                startActivity(regIntent);

            }
        });

    }

    private void validate()
    {
        if (email.getText().toString().isEmpty())
        {
            email.setError("Please enter email");
            email.requestFocus();
        }
        else if (password.getText().toString().isEmpty())
        {
            password.setError("Please enter password");
            password.requestFocus();
        }
        else
        {
            loginUser();
        }
    }

    private void loginUser()
    {
        final String mail = email.getText().toString().trim();
        final String pass = password.getText().toString().trim();

        class LoginUser extends AsyncTask<Void, Void, String>
        {
            private ProgressBar progressBar;

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("email", mail);
                params.put("password", pass);

                return requestHandler.sendPostRequest(URLs.URL_LOGIN, params);
            }

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressBar = (ProgressBar) findViewById(R.id.loginPageProgressBar);
                progressBar.setVisibility(View.VISIBLE);

            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                progressBar.setVisibility(View.GONE);

                try
                {

                    JSONObject obj = new JSONObject(s);


                    if (!obj.getBoolean("error"))
                    {
                        Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_SHORT).show();

                        JSONObject userJson = obj.getJSONObject("user");

                        Buyer buyer = new Buyer(
                                userJson.getInt("buyer_id"),
                                userJson.getString("buyer_name"),
                                userJson.getString("buyer_mobile"),
                                userJson.getString("buyer_email"),
                                userJson.getString("buyer_dob")
                        );

                        SharedPrefManager.getInstance(getApplicationContext()).buyerLogin(buyer);

                        Intent verifyIntent = new Intent(getApplicationContext(), HomeActivity.class);
                        startActivity(verifyIntent);
                    }
                    else
                    {
                        Toast.makeText(getApplicationContext(), "No user found", Toast.LENGTH_SHORT).show();
                    }
                }
                catch(JSONException e)
                {
                    e.printStackTrace();
                }

            }
        }

        LoginUser lu = new LoginUser();
        lu.execute();

    }
}