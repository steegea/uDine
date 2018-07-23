import java.io.*;
import java.net.HttpURLConnection;
import java.net.URL;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.*;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.*;

public class Json
{
    public static void main(String[] args) throws Exception {

        List<String> Times = new ArrayList<>();
        List<String> Cat = new ArrayList<>();
        List<String> Item = new ArrayList<>();

        PrintWriter TimesWriter = new PrintWriter("Times.txt", "UTF-8");
        PrintWriter CatWriter = new PrintWriter("Cat.txt", "UTF-8");
        PrintWriter ItemWriter = new PrintWriter("Item.txt", "UTF-8");

        //Gets Json from the web
        String Json = GetFile();
        System.out.println(Json);

        //Write Json to file
        PrintWriter writer = new PrintWriter("menu.json", "UTF-8");
        writer.println(Json);
        writer.close();

        // parsing file "menu.json
        Object obj = new JSONParser().parse(new FileReader("menu.json"));

        // typecasting obj to JSONObject
        JSONObject jo = (JSONObject) obj;

        // getting Status
        String Status = (String) jo.get("status");
        System.out.println(Status);

        if(Status.equals("success"))
        {

            Map PlaceObj = (Map) jo.get("menu");

            //Create TimeArray
            JSONArray TimesArray = (JSONArray) ((JSONObject) jo.get("menu")).get("periods");

            for (Iterator TimesArrayInter = TimesArray.iterator(); TimesArrayInter.hasNext(); )
            {
                //Make Object for each Object and String for display
                JSONObject TimesObj = (JSONObject) TimesArrayInter.next();
                String TimesString = TimesObj.toJSONString();
                //          System.out.println(TimesString);

                //Get the name of the Object and add to ArrayList
                Times.add(TimesObj.get("name").toString());
                TimesWriter.println(TimesObj.get("name"));
                System.out.println("\n" + TimesObj.get("name") + "\n");

                //Make Cat array using the Time Object
                JSONArray CatArray = (JSONArray) TimesObj.get("categories");
                for (Iterator CatArrayInter = CatArray.iterator(); CatArrayInter.hasNext(); )
                {
                    JSONObject CatObj = (JSONObject) CatArrayInter.next();
                    //ITEMS TO NOT INCLUDE
                    if(CatObj.get("items").toString().equals("[]")||CatObj.get("name").toString().equals("On the Go"))
                    {
                        try
                        {
                            CatObj = (JSONObject) CatArrayInter.next();
                        }
                        catch(NoSuchElementException ex)
                        {
                            if (!CatArrayInter.hasNext() && TimesArrayInter.hasNext()) { CatWriter.println("~T~"); }  continue;
                        }
                    }
                    String CatString = CatObj.toJSONString();
                    //              System.out.println(CatString);

                    Cat.add(CatObj.get("name").toString());
                    CatWriter.println(CatObj.get("name"));
                    System.out.println("\n" + CatObj.get("name") + "\n");


                    //delimiter to separate Times
                    if (!CatArrayInter.hasNext() && TimesArrayInter.hasNext())
                    {
                        CatWriter.println("~T~");
                    }

                    JSONArray ItemArray = (JSONArray) CatObj.get("items");
                    for (Iterator ItemArrayInter = ItemArray.iterator(); ItemArrayInter.hasNext(); )
                    {
                        JSONObject ItemObj = (JSONObject) ItemArrayInter.next();
                        String ItemString = ItemObj.toJSONString();
                        //                  System.out.println(ItemString);

                        Item.add(ItemObj.get("name").toString());
                        ItemWriter.println(ItemObj.get("name"));
                        System.out.println(ItemObj.get("name"));

                        //delimiter to separate Cat
//                        if (!ItemArrayInter.hasNext() && CatArrayInter.hasNext() && !CatArray.get(i).toString().contains(LeaveOutOne))
                        if (!ItemArrayInter.hasNext() && CatArrayInter.hasNext())
                        {
                            ItemWriter.println("~C~");
                        }
                    }

                }
                //delimiter to separate Times
                if (TimesArrayInter.hasNext())
                {
                    ItemWriter.println("~T~");
                }
            }
            System.out.println();
            System.out.println();
        }
        else
        {


        }
        System.out.println(Times.toString());
        System.out.println(Cat.toString());
        System.out.println(Item.toString());

        TimesWriter.close();
        CatWriter.close();
        ItemWriter.close();

        ChangeFile();

    }
    static String GetFile() throws IOException {

        //Get Date
        DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
        Date date = new Date();
        System.out.println(dateFormat.format(date)); //2018/11/18

        //Web link with date included
        //Wentworth                                                                                                                                         2018-07-10
        String url = "https://new.dineoncampus.com/v1/location/menu.json?site_id=5751fd3390975b60e048938a&location_id=586bf1306c1f84daeb6c89cb&date="+dateFormat.format(date)+"&platform=0";
        //Northeastern
//        String url = "https://new.dineoncampus.com/v1/location/menu.json?site_id=5751fd2b90975b60e048929a&location_id=586d17503191a27120e60dec&date="+dateFormat.format(date)+"&platform=0";

        //Get url
        URL obj = new URL(url);
        HttpURLConnection conn = (HttpURLConnection) obj.openConnection();
        conn.setRequestMethod("GET");
        conn.setRequestProperty("Accept", "application/json");
        BufferedReader br = new BufferedReader(new InputStreamReader((conn.getInputStream())));

        //String for Json
        String output;
        System.out.println("Output from "+url);
        output = br.readLine();

        //Return Json
        return output;
    }


    static void ChangeFile() throws IOException
    {
        // Open a temporary file to write to.
        PrintWriter ItemTempWriter = new PrintWriter("ItemTemp.txt", "UTF-8");

        BufferedReader br = null;
        FileReader reader = null;

        //Open Items file
        reader = new FileReader("Item.txt");
        br = new BufferedReader(reader);

        //Strings to hold items
        String Now;
        String Last = "";

        //Go threw and check if the file needs fixing
        while ((Now = br.readLine()) != null)
        {
            System.out.println(Now);
            if(Now.equals("~T~")&&Last.equals("~C~"))
            {
                //DO NOTHING
            }
            else
            {
                if(!Last.equals("")) { ItemTempWriter.println(Last); }
            }
            Last = Now;
        }

        //Close everything
        ItemTempWriter.close();
        reader.close();
        br.close();

        //Delete original
        File realName = new File( "Item.txt");
        if (realName.exists()) {
            realName.delete();
        } else {
            System.err.println(
                    "I cannot find '" + realName + "' ('" + realName.getAbsolutePath() + "')");
        }
        //Rename old to new
        new File("ItemTemp.txt").renameTo(realName);
    }
}