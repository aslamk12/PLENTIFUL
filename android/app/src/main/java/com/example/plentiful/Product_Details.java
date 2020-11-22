package com.example.plentiful;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.google.android.material.bottomnavigation.BottomNavigationView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class Product_Details extends AppCompatActivity {
    int product_id,price,stock,cart_id;
    int loggedIn_user,qty=1;
    String pname,image,description,seller;
    ImageView iv_product;
    TextView tv_pname,tv_price,tv_seller,tv_description,tv_qty;
    Button bt_cart,btn_dec,btn_inc;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product_details);

        BottomNavigationView bottomNavigationView = findViewById(R.id.bottom_navigation);
        //bottomNavigationView.setSelectedItemId(R.id.profile_nav);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()){
                    case R.id.profile_nav:
                        startActivity(new Intent(getApplicationContext(),ProfileActivity.class));
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
                }
                return false;
            }
        });

        Buyer buyer = SharedPrefManager.getInstance(this).getUser();
        loggedIn_user = buyer.getBid();
        product_id=getIntent().getExtras().getInt("product_id");
        tv_pname=findViewById(R.id.product_name);
        tv_price=findViewById(R.id.product_price);
        tv_seller=findViewById(R.id.product_seller);
        tv_description=findViewById(R.id.Description);
        iv_product=findViewById(R.id.product_image);
        tv_qty=findViewById(R.id.tv_qty_value);
        tv_qty.setText(String.valueOf(qty));
        btn_dec=findViewById(R.id.decrementQuantity);
        btn_dec.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                decrement();
            }
        });
        btn_inc=findViewById(R.id.incrementQuantity);
        btn_inc.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                increment();
            }
        });
        bt_cart=findViewById(R.id.cart);

        load_productdetails();
        bt_cart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                add_cart();
            }
        });

    }

    private void load_productdetails()
    {
        class LoadProductDetails extends AsyncTask<Void,Void, String>
        {

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String,String> params = new HashMap<>();

                params.put("product_id", String.valueOf(product_id));


                return requestHandler.sendPostRequest(URLs.URL_PRODUCT_DETAILS, params);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                try
                {
                    JSONArray array = new JSONArray(s);
                    for (int i = 0; i < array.length(); i++) {

                        JSONObject users = array.getJSONObject(i);
                        pname = users.getString("p_name");
                        price = users.getInt("price");
                        image = users.getString("p_image");
                        stock = users.getInt("stock");
                        description = users.getString("description");
                        seller = users.getString("seller");
                    }

                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }

                setdetails();


            }
        }
        LoadProductDetails loadProductDetails = new LoadProductDetails();
        loadProductDetails.execute();
    }
    void increment(){
        if (qty < 5){
            qty++;
            tv_qty.setText(String.valueOf(qty));
        } else {
            Toast.makeText(
                    getApplicationContext(),
                    "Limit of 5 products only",
                    Toast.LENGTH_SHORT)
                    .show();
        }
    }

    void decrement(){
        if (qty > 1){
            qty--;
            tv_qty.setText(String.valueOf(qty));
        }
    }

    private void setdetails()
    {
        tv_pname.setText(pname);
        tv_price.setText("RS."+price);
        tv_seller.setText(seller);
        tv_description.setText(description);

        Glide.with(Product_Details.this)
                .load(image)
                .into(iv_product);
    }
    private void add_cart()
    {
        if(stock<1)
        {
            Toast.makeText(Product_Details.this,"this product currently unavailable", Toast.LENGTH_LONG).show();
        }
        else
        {
            class Add_cart extends AsyncTask<Void,Void, String>
            {

                @Override
                protected String doInBackground(Void... voids) {

                    RequestHandler requestHandler = new RequestHandler();

                    HashMap<String,String> params = new HashMap<>();

                    params.put("product_id", String.valueOf(product_id));
                    params.put("Buyer_id", String.valueOf(loggedIn_user));
                    params.put("price", String.valueOf(price));
                    params.put("qty", String.valueOf(qty));




                    return requestHandler.sendPostRequest(URLs.URL_ADD_CART, params);
                }
                @Override
                protected void onPostExecute(String s) {
                    super.onPostExecute(s);

                    try
                    {
                        JSONArray array = new JSONArray(s);
                        for (int i = 0; i < array.length(); i++) {

                            JSONObject users = array.getJSONObject(i);
                            cart_id = users.getInt("cart_id");

                            Toast.makeText(getApplicationContext(), "product added to cart", Toast.LENGTH_SHORT).show();
                        }

                    }
                    catch (JSONException e)
                    {
                        e.printStackTrace();
                    }

                }
            }
            Add_cart ac = new Add_cart();
            ac.execute();
        }
    }

}