package com.example.plentiful;
import android.content.Context;
import android.os.AsyncTask;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.ProgressBar;
import android.widget.Toast;
import android.content.Context;
import android.content.Intent;
import android.view.ContextMenu;
import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;


import com.bumptech.glide.Glide;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.List;

public class CartlistAdapter extends RecyclerView.Adapter<CartlistAdapter.CartlistViewHolder> {
    private Context mCtx;
    private List<Cartlist> cartlists;


    public CartlistAdapter(Context mCtx, List<Cartlist> cartlists) {
        this.mCtx = mCtx;
        this.cartlists = cartlists;
    }
    @NonNull
    @Override
    public CartlistAdapter.CartlistViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.cart_list, null);

        return new CartlistAdapter.CartlistViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull CartlistAdapter.CartlistViewHolder holder, int position) {

        Cartlist cartlist = cartlists.get(position);
        Glide.with(mCtx)
                .load(cartlist.getP_image())
                .into(holder.imageView);

        holder.tv_cartpname.setText(cartlist.getP_name());
        holder.tv_price.setText("Rs."+(cartlist.getPrice()));
        holder.tv_quantity.setText("Qty:"+(cartlist.getQty()));

    }

    @Override
    public int getItemCount() {
        return cartlists.size();
    }

    class CartlistViewHolder extends RecyclerView.ViewHolder{

        private final Context context;
        TextView tv_cartpname, tv_price,tv_quantity;
        ImageView imageView;
        //Button cart_del;

        public CartlistViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            imageView = itemView.findViewById(R.id.iv_cartproduct);
            tv_cartpname = itemView.findViewById(R.id.tv_cartproduct_name);
            tv_price = itemView.findViewById(R.id.tv_cartproduct_price);
            tv_quantity=itemView.findViewById(R.id.tv_quantity);
//            cart_del = itemView.findViewById(R.id.btn_delcart);
//            cart_del.setOnClickListener(new View.OnClickListener() {
//                @Override
//                public void onClick(View view) {
//                    int cart_id;
//                    cart_id=getIntent().getExtras().getInt("cart_id");
//
//                    //item_delete();
//                }
//            });
        }
//        private void item_delete()
//        {
//            class Item_delete extends AsyncTask<Void, Void, String>
//            {
//
//                @Override
//                protected String doInBackground(Void... voids)
//                {
//                    RequestHandler requestHandler = new RequestHandler();
//
//                    HashMap<String, String> params = new HashMap<>();
//                    params.put("cart_id", cart_id);
//
//                    return requestHandler.sendPostRequest(URLs.URL_EDITPASS, params);
//                }
//
//
//                @Override
//                protected void onPostExecute(String s) {
//                    super.onPostExecute(s);
//
//                    try
//                    {
//                        JSONObject obj = new JSONObject(s);
//
//                        if (!obj.getBoolean("error"))
//                        {
//                            Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_SHORT).show();
//
//                            Intent verifyIntent = new Intent(getApplicationContext(), CartActivity.class);
//                            startActivity(verifyIntent);
//
//                        }
//                        else
//                        {
//                            Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_SHORT).show();
//                        }
//                    }
//                    catch (JSONException e)
//                    {
//                        e.printStackTrace();
//                    }
//                }
//            }
//            Item_delete id = new Item_delete();
//            id.execute();
//        }
//
//        }
    }
}

