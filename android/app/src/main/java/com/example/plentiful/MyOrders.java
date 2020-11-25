package com.example.plentiful;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.ProgressBar;

import com.google.android.material.bottomnavigation.BottomNavigationView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class MyOrders extends AppCompatActivity {
    List<Myorderlist> myorderlists;
    RecyclerView recyclerView;
    int order_id,buyer_id,oi_id,product_id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_orders);
        BottomNavigationView bottomNavigationView = findViewById(R.id.bottom_navigation);
        //bottomNavigationView.setSelectedItemId(R.id.cart_nav);
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
        recyclerView = findViewById(R.id.rv_myorder);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        Buyer buyer = SharedPrefManager.getInstance(this).getUser();
        buyer_id = buyer.getBid();
        myorderlists = new ArrayList<>();
        loadMyorder_products();

    }
    private void loadMyorder_products() {
        class LoadMyorder_products extends AsyncTask<Void, Void, String> {

            ProgressBar progressBar = findViewById(R.id.pb_myorder);

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("buyer_id",String.valueOf(buyer_id));


                return requestHandler.sendPostRequest(URLs.URL_VIEW_MYORDER, params);
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

                        myorderlists.add(new Myorderlist(
                                users.getInt("oi_id"),
                                //users.getInt("pid"),
                                users.getInt("price"),
                                users.getInt("qty"),
                                users.getInt("total"),
                                users.getInt("delcharge"),
                                users.getString("p_name"),
                                users.getString("p_image")

                        ));
                    }

                    MyorderlistAdapter adapter = new MyorderlistAdapter(MyOrders.this, myorderlists);
                    recyclerView.setAdapter(adapter);
                    progressBar.setVisibility(View.GONE);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
        LoadMyorder_products lc = new LoadMyorder_products();
        lc.execute();
    }
}