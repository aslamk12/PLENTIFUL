package com.example.plentiful;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.AsyncTask;
import android.view.MenuItem;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.util.Log;
import android.util.Patterns;
import android.view.View;
import android.os.Handler;

import android.os.Bundle;

import com.google.android.material.bottomnavigation.BottomNavigationView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class HomeActivity extends AppCompatActivity {
    List<Homelist> homelists;
    RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        BottomNavigationView bottomNavigationView = findViewById(R.id.bottom_navigation);

        bottomNavigationView.setSelectedItemId(R.id.home_nav);
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
        recyclerView = findViewById(R.id.rv_home);
        recyclerView.setHasFixedSize(true);
        HomelistAdapter homeadapter = new HomelistAdapter(HomeActivity.this, homelists);
        //recyclerView.setLayoutManager(new LinearLayoutManager(this));
        recyclerView.setLayoutManager(new GridLayoutManager(this,2));


        homelists = new ArrayList<>();
        loadHome();

    }
    private void loadHome()
    {
        class LoadHome extends AsyncTask<Void, Void, String>
        {
            ProgressBar progressBar = findViewById(R.id.prog_bar_home);

            @Override
            protected String doInBackground(Void... voids)
            {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params  = new HashMap<>();


                return requestHandler.sendPostRequest(URLs.URL_VIEW_HOME, params);
            }

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressBar.setVisibility(View.VISIBLE);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                try
                {
                    JSONArray array = new JSONArray(s);
                    for(int i=0; i < array.length(); i++)
                    {

                        JSONObject users = array.getJSONObject(i);

                        homelists.add(new Homelist(
                                users.getInt("pid"),
                                users.getString("pname"),
                                users.getString("pimage")

                        ));
                    }


                    HomelistAdapter adapter = new HomelistAdapter(HomeActivity.this, homelists);
                    recyclerView.setAdapter(adapter);
                    progressBar.setVisibility(View.GONE);
                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }
            }
        }
        LoadHome lc = new LoadHome();
        lc.execute();
    }


}