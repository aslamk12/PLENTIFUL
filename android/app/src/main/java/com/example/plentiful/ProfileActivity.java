package com.example.plentiful;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.AsyncTask;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import java.text.SimpleDateFormat;

import android.widget.ProgressBar;
import android.widget.Toast;
import java.util.Calendar;
import java.util.Locale;
import android.app.DatePickerDialog;

import org.json.JSONException;
import org.json.JSONObject;


import java.util.HashMap;

import android.os.Bundle;

import com.google.android.material.bottomnavigation.BottomNavigationView;

public class ProfileActivity extends AppCompatActivity {
    int loggedIn_user;
    String loggedIn_email,loggedIn_name,loggedIn_mobile;
    EditText edt_pfname,edt_pfmob,edt_pfpass, edt_pfcpass;
    Button btn_edt,btn_cpass;
    String name,mobile,password;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        BottomNavigationView bottomNavigationView = findViewById(R.id.bottom_navigation);
        //bottomNavigationView.setSelectedItemId(R.id.profile_nav);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()){

                    case R.id.profile_nav:
                        startActivity(new Intent(getApplicationContext(),ViewProfile.class));
                        overridePendingTransition(0,0);
                        return true;

                    case R.id.category_nav:
                        startActivity(new Intent(getApplicationContext(),CategoryActivity.class));
                        overridePendingTransition(0,0);
                        return true;

                    case R.id.home_nav:
                        startActivity(new Intent(getApplicationContext(),HomeActivity.class));
                        overridePendingTransition(0,0);
                        return true;

                    case R.id.cart_nav:
                        startActivity(new Intent(getApplicationContext(),CartActivity.class));
                        overridePendingTransition(0,0);
                        return true;

                    case R.id.sign_out:
                        SharedPrefManager.getInstance(getApplicationContext()).logout();
                        return true;
                }
                return false;
            }
        });

        Buyer buyer = SharedPrefManager.getInstance(this).getUser();
        loggedIn_user = buyer.getBid();
        loggedIn_email = buyer.getEmail();
        loggedIn_name= buyer.getFull_name();
        loggedIn_mobile = buyer.getMobile();

        edt_pfname = findViewById(R.id.et_pfname);
        edt_pfmob = findViewById(R.id.et_pfmobile);
        edt_pfpass = findViewById(R.id.et_pfpass);
        edt_pfcpass = findViewById(R.id.et_pfcpass);
        btn_edt = findViewById(R.id.btn_edit);
        btn_cpass = findViewById(R.id.btn_cpass);
        edt_pfname.setText(loggedIn_name);
        edt_pfmob.setText(loggedIn_mobile);
        btn_edt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                validatepf();
            }
        });
        btn_cpass.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                validatepass();
            }
        });
    }

    private void validatepf()
    {
        if(edt_pfname.getText().toString().isEmpty())
        {
            edt_pfname.setError("Please enter your full name!");
            edt_pfname.requestFocus();
        }

        else if(edt_pfmob.getText().toString().isEmpty())
        {
            edt_pfmob.setError("Please enter your mobile number.");
            edt_pfmob.requestFocus();
        }
        else if(edt_pfmob.getText().toString().length()<10)
        {
            edt_pfmob.setError("Mobile number must be 10 digits.");
            edt_pfmob.requestFocus();
        }
        else
        {
            updateUser();
        }
    }
    private void validatepass() {
        if(edt_pfpass.getText().toString().isEmpty())
        {
            edt_pfpass.setError("Please enter your password");
            edt_pfpass.requestFocus();
        }
        else if(edt_pfpass.getText().toString().length()<6)
        {
            edt_pfpass.setError("Password must have minimum 6 characters ");
            edt_pfpass.requestFocus();
        }
        else if (edt_pfcpass.getText().toString().isEmpty())
        {
            edt_pfcpass.setError("Please confirm your password");
            edt_pfcpass.requestFocus();
        }
        else if (!(edt_pfcpass.getText().toString().equals(edt_pfpass.getText().toString())))
        {
            edt_pfcpass.setError("Please use same password given");
            edt_pfcpass.requestFocus();
        }
        else
        {
            cpassUser();
        }

    }
    private void updateUser()
    {
        name = edt_pfname.getText().toString().trim();
        mobile = edt_pfmob.getText().toString().trim();
    class UpdateUser extends AsyncTask<Void, Void, String>
    {

        @Override
        protected String doInBackground(Void... voids)
        {
            RequestHandler requestHandler = new RequestHandler();

            HashMap<String, String> params = new HashMap<>();
            params.put("fullname", name);
            params.put("mobile", mobile);
            params.put("bid", String.valueOf(loggedIn_user));

            return requestHandler.sendPostRequest(URLs.URL_EDITPROFILE, params);
        }


        @Override
        protected void onPostExecute(String s) {
            super.onPostExecute(s);

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
                    Toast.makeText(getApplicationContext(), "can't update profile", Toast.LENGTH_SHORT).show();
                }
            }
            catch (JSONException e)
            {
                e.printStackTrace();
            }
        }
    }
    UpdateUser ru = new UpdateUser();
        ru.execute();
}
    private void cpassUser()
    {
        password = edt_pfpass.getText().toString().trim();

        class CpassUser extends AsyncTask<Void, Void, String>
        {

            @Override
            protected String doInBackground(Void... voids)
            {
                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("password", password);
                params.put("email", loggedIn_email);

                return requestHandler.sendPostRequest(URLs.URL_EDITPASS, params);
            }


            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

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
                        Toast.makeText(getApplicationContext(), "can't change password", Toast.LENGTH_SHORT).show();
                    }
                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }
            }
        }
        CpassUser cu = new CpassUser();
        cu.execute();
    }
}