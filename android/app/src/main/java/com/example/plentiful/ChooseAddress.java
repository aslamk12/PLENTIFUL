package com.example.plentiful;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.AsyncTask;

import android.view.View;
import android.widget.Button;
import android.widget.EditText;


import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

import android.os.Bundle;
import android.widget.Toast;

public class ChooseAddress extends AppCompatActivity {
    EditText et_name, et_pincode,et_num, et_house, et_city, et_landmark;
    Button btn_add;
    String name,pin,mobile,house,city,landmark;
    int order_id,oi_id,buyer_id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_choose_address);
        Buyer buyer = SharedPrefManager.getInstance(this).getUser();
        buyer_id = buyer.getBid();
        oi_id=getIntent().getExtras().getInt("oi_id");
        et_name=findViewById(R.id.fullName);
        et_num=findViewById(R.id.phoneNumber);
        et_pincode=findViewById(R.id.pincode);
        et_house=findViewById(R.id.houseno);
        et_city=findViewById(R.id.city);
        et_landmark=findViewById(R.id.landmark);
        btn_add=findViewById(R.id.btn_order);
        btn_add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                add_adrs();
            }
        });
    }
    private void add_adrs(){
        name=et_name.getText().toString().trim();
        mobile=et_num.getText().toString().trim();
        pin=et_pincode.getText().toString().trim();
        house=et_house.getText().toString().trim();
        city=et_city.getText().toString().trim();
        landmark=et_landmark.getText().toString().trim();
        class Add_adrs extends AsyncTask<Void, Void, String>
        {

            @Override
            protected String doInBackground(Void... voids)
            {
                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("fullname", name);
                params.put("mobile", mobile);
                params.put("pincode", pin);
                params.put("house", house);
                params.put("city", city);
                params.put("landmark", landmark);
                params.put("buyer_id", String.valueOf(buyer_id));
                params.put("oi_id", String.valueOf(oi_id));

                return requestHandler.sendPostRequest(URLs.URL_ADD_ADRS, params);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                try
                {
                    JSONArray array = new JSONArray(s);
                    for (int i = 0; i < array.length(); i++) {

                        JSONObject users = array.getJSONObject(i);
                        order_id = users.getInt("o_id");

                        Toast.makeText(getApplicationContext(), "address added", Toast.LENGTH_SHORT).show();
                        Intent corderIntent = new Intent(getApplicationContext(), ConfirmOrder.class);
                        corderIntent.putExtra("oi_id",oi_id);
                        corderIntent.putExtra("order_id",order_id);
                        startActivity(corderIntent);


                    }

                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }

            }
        }

        Add_adrs as = new Add_adrs();
        as.execute();

    }
}