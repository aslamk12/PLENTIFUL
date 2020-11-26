package com.example.plentiful;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.AsyncTask;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ProgressBar;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import android.os.Bundle;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.material.bottomnavigation.BottomNavigationView;

public class CartActivity extends AppCompatActivity {
    List<Cartlist> cartlists;
    RecyclerView recyclerView;
    int cart_id,a_cart_id,buyer_id,total=0,oi_id;
    TextView tv_total;
    Button cadrs;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cart);

        BottomNavigationView bottomNavigationView = findViewById(R.id.bottom_navigation);
        bottomNavigationView.setSelectedItemId(R.id.cart_nav);
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
                        return true;

                    case R.id.sign_out:
                        SharedPrefManager.getInstance(getApplicationContext()).logout();
                        return true;
                }
                return false;
            }
        });

        recyclerView = findViewById(R.id.rv_cart);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        Buyer buyer = SharedPrefManager.getInstance(this).getUser();
        buyer_id = buyer.getBid();
        tv_total =findViewById(R.id.tv_total);
        cadrs =findViewById(R.id.choose_address);

        cartlists = new ArrayList<>();
        loadCart_products();
        cadrs.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                add_order();

            }
        });
    }
    private void loadCart_products() {
        class LoadCart_products extends AsyncTask<Void, Void, String> {
            ProgressBar progressBar = findViewById(R.id.pb_cart);

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("buyer_id",String.valueOf(buyer_id));


                return requestHandler.sendPostRequest(URLs.URL_VIEW_CART, params);
            }

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressBar.setVisibility(View.VISIBLE);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                try {
                    JSONArray array = new JSONArray(s);
                    for (int i = 0; i < array.length(); i++) {

                        JSONObject users = array.getJSONObject(i);

                        cartlists.add(new Cartlist(
                                users.getInt("cart_id"),
                                users.getInt("price"),
                                users.getInt("qty"),
                                users.getInt("total"),
                                users.getString("p_name"),
                                users.getString("p_image")

                        ));
                    }

                    for (int j=0; j<array.length(); j++)
                    {
                        JSONObject users = array.getJSONObject(j);
                        int price = users.getInt("total");

                         total = total + price;
                    }

                    for (int k=0; k<array.length(); k++)
                    {
                        JSONObject users = array.getJSONObject(k);
                        a_cart_id = users.getInt("cart_id");

                    }




                    tv_total.setText("Rs : " + total);

                    CartlistAdapter adapter = new CartlistAdapter(CartActivity.this, cartlists);
                    recyclerView.setAdapter(adapter);
                    progressBar.setVisibility(View.GONE);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
        LoadCart_products lc = new LoadCart_products();
        lc.execute();
    }
    private void add_order()
    {
        class Add_order extends AsyncTask<Void, Void, String> {

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("buyer_id",String.valueOf(buyer_id));
                params.put("total",String.valueOf(total));
                params.put("cart_id",String.valueOf(a_cart_id));


                return requestHandler.sendPostRequest(URLs.URL_ADD_ORDER, params);
            }
            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                try
                {
                    JSONArray array = new JSONArray(s);
                    for (int i = 0; i < array.length(); i++) {

                        JSONObject users = array.getJSONObject(i);
                        oi_id = users.getInt("oi_id");


                        Intent orderIntent = new Intent(getApplicationContext(), ChooseAddress.class);
                        orderIntent.putExtra("oi_id",oi_id);
                        orderIntent.putExtra("cart_id",a_cart_id);
                        startActivity(orderIntent);


                    }

                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }

            }
        }
        Add_order ao = new Add_order();
        ao.execute();
    }
}
