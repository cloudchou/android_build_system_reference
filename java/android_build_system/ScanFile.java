package android_build_system;

import java.io.File;

import net.sf.json.JSONArray;
import net.sf.json.JSONObject;

public class ScanFile {

	public static JSONObject scanDir(File dir, JSONObject obj, int depth) {
		File[] files = dir.listFiles();
		JSONArray children=new JSONArray(); 
		 
		return obj.getJSONArray(key);
	}

	public static void main(String[] args) {
		File f = new File(
				"D:\\Program Files\\wamp\\www\\android_build_system_reference\\java");
		JSONObject object = new JSONObject();
		object.put("Hello", "world");
		System.out.println(object.toString());
	}
}
