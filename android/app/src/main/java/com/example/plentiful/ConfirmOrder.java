package com.example.plentiful;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;
import java.util.Locale;

public class ConfirmOrder extends AppCompatActivity {
    TextView tv_item_price,tv_del_charge,tv_order_total,tv_adrs_name,tv_adrs,tv_est;
    Button btn_confirm;
    int oi_id,order_id,buyer_id,del_charge,item_price,order_total,pincode,cart_id;
    String adrs_name,adrs,city,status,date;
            ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_confirm_order);

        date = new SimpleDateFormat("dd-MM-yyyy", Locale.getDefault()).format(new Date());

        Buyer buyer = SharedPrefManager.getInstance(this).getUser();
        buyer_id = buyer.getBid();
        oi_id=getIntent().getExtras().getInt("oi_id");
        order_id=getIntent().getExtras().getInt("order_id");
        cart_id=getIntent().getExtras().getInt("cart_id");
        tv_item_price=findViewById(R.id.tv_item);
        tv_del_charge=findViewById(R.id.tv_delivery);
        tv_order_total=findViewById(R.id.tv_order_total);
        tv_adrs_name=findViewById(R.id.tv_del_adrs_name);
        tv_adrs=findViewById(R.id.tv_del_adrs);
        tv_est = findViewById(R.id.tv_del_date);
        btn_confirm=findViewById(R.id.btn_confirm);
        load_orderlist();
        btn_confirm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                confirm_order();
                send_order();
            }
        });

    }
    private void load_orderlist()
    {
        class Load_orderlist extends AsyncTask<Void,Void, String>
        {

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String,String> params = new HashMap<>();

                params.put("oi_id", String.valueOf(oi_id));
                params.put("order_id", String.valueOf(order_id));



                return requestHandler.sendPostRequest(URLs.URL_VIEW_ORDERLIST, params);
            }
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                try
                {
                    JSONArray array = new JSONArray(s);
                    for (int i = 0; i < array.length(); i++)
                    {

                        JSONObject users = array.getJSONObject(i);
                        item_price = users.getInt("item_price");
                        del_charge = users.getInt("del_charge");
                        adrs_name = users.getString("adrs_name");
                        adrs = users.getString("adrs");
                        pincode = users.getInt("pincode");
                        city=users.getString("city");
                    }

                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }

                setdetails();


            }
        }
        Load_orderlist lo = new Load_orderlist();
        lo.execute();
    }
    private void setdetails()
    {
        order_total=item_price+del_charge;
        tv_item_price.setText("Rs."+item_price);
        tv_del_charge.setText("RS."+del_charge);
        tv_order_total.setText("RS."+order_total);
        tv_adrs_name.setText(adrs_name);
        tv_est.setText(date);
        tv_adrs.setText(adrs+","+city+","+pincode);
    }
    private  void confirm_order(){
        class Confirm_order extends AsyncTask<Void,Void, String>
        {

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String,String> params = new HashMap<>();

                params.put("oi_id", String.valueOf(oi_id));
                params.put("cart_id", String.valueOf(cart_id));


                return requestHandler.sendPostRequest(URLs.URL_CONFIRM_ORDER, params);
            }
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                try
                {
                    JSONArray array = new JSONArray(s);
                    for (int i = 0; i < array.length(); i++)
                    {

                        JSONObject users = array.getJSONObject(i);
                        status = users.getString("status");

                        Toast.makeText(getApplicationContext(), "product ordered successfully", Toast.LENGTH_SHORT).show();
                        Intent returnIntent = new Intent(getApplicationContext(), HomeActivity.class);
                        startActivity(returnIntent);


                    }

                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }

            }
        }
        Confirm_order co = new Confirm_order();
        co.execute();

    }
    private  void send_order(){
        class Send_order extends AsyncTask<Void,Void, String>
        {

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String,String> params = new HashMap<>();

                params.put("oi_id", String.valueOf(oi_id));

                return requestHandler.sendPostRequest(URLs.URL_SEND_ORDER, params);
            }
        }
        Send_order so = new Send_order();
        so.execute();

    }
}