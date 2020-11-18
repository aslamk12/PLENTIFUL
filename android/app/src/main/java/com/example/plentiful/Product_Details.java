package com.example.plentiful;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class Product_Details extends AppCompatActivity {
    int product_id,price,stock,cart_id;
    int loggedIn_user;
    String pname,image,description,seller;
    ImageView iv_product;
    TextView tv_pname,tv_price,tv_seller,tv_description;
    Button bt_cart;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product_details);
        Buyer buyer = SharedPrefManager.getInstance(this).getUser();
        loggedIn_user = buyer.getBid();
        product_id=getIntent().getExtras().getInt("product_id");
        tv_pname=findViewById(R.id.product_name);
        tv_price=findViewById(R.id.product_price);
        tv_seller=findViewById(R.id.product_seller);
        tv_description=findViewById(R.id.Description);
        iv_product=findViewById(R.id.product_image);
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

    private void setdetails()
    {
        tv_pname.setText(pname);
        tv_price.setText(String.valueOf(price));
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
        view_cart();
    }

    private void view_cart()
    {
        Intent cartIntent = new Intent(Product_Details.this,CartActivity.class);
        cartIntent.putExtra("buyer_id", loggedIn_user);
        cartIntent.putExtra("cart_id", cart_id);
        startActivity(cartIntent);
    }
}