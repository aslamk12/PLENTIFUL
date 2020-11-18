package com.example.plentiful;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.AsyncTask;
import android.view.View;
import android.widget.ProgressBar;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.HashSet;
import java.util.List;

import android.os.Bundle;
import android.widget.TextView;
import android.widget.Toast;

public class CartActivity extends AppCompatActivity {
    List<Cartlist> cartlists;
    RecyclerView recyclerView;
    int cart_id,buyer_id,total=0;
    TextView tv_total;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cart);

        recyclerView = findViewById(R.id.rv_cart);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        cart_id=getIntent().getExtras().getInt("cart_id");
        buyer_id=getIntent().getExtras().getInt("buyer_id");
        tv_total =findViewById(R.id.tv_total);

        cartlists = new ArrayList<>();
        loadCart_products();
    }
    private void loadCart_products() {
        class LoadCart_products extends AsyncTask<Void, Void, String> {
            ProgressBar progressBar = findViewById(R.id.pb_cart);

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                //params.put("cart_id",String.valueOf(cart_id));
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
                                //users.getInt("pid"),
                                //users.getInt("bid"),
                                users.getInt("price"),
                                users.getInt("qty"),
                                //users.getInt("total"),
                                users.getString("p_name"),
                                users.getString("p_image")

                        ));
                    }

                    for (int j=0; j<array.length(); j++)
                    {
                        JSONObject users = array.getJSONObject(j);
                        int price = users.getInt("price");

                         total = total + price;
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
}
