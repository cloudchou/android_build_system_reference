package android_build_system;

import java.io.File;
import java.io.FileFilter;

import net.sf.json.JSONArray;
import net.sf.json.JSONObject;

public class ScanFile {

	private static final String prefix = "/";
	private static final String BUILD_PATH = "D:\\Program Files\\wamp\\www\\android_build_system_reference";

	public static JSONObject scanDir(File dir, int depth) {

		JSONObject cur = new JSONObject();
		cur.put("text", dir.getName());
		if (depth <= 0) {
			cur.put("expanded", true);
		} else {
			cur.put("expanded", false);
		}

		File[] dirs = dir.listFiles(new FileFilter() {
			@Override
			public boolean accept(File pathname) {
				return pathname.isDirectory();
			}
		});

		JSONArray children = new JSONArray();
		for (File f : dirs) {
			JSONObject childrenDir = scanDir(f, depth + 1);
			children.add(childrenDir);
		}

		File[] files = dir.listFiles(new FileFilter() {
			@Override
			public boolean accept(File pathname) {
				return !pathname.isDirectory();
			}
		});
		for (File f : files) {
			JSONObject tmp = new JSONObject();
			// tmp.put("text", f.getName());
			String filePath = f.getAbsolutePath();
			filePath = filePath.replace(BUILD_PATH, "");
			filePath = filePath.replace("\\", "/");
			tmp.put("text", "<a href=\"" + filePath + "\">" + f.getName()
					+ "</a>");
			children.add(tmp);
		}

		cur.put("children", children);
		return cur;
	}

	public static void main(String[] args) {
		File f = new File(BUILD_PATH + "\\build");
		JSONObject tree = scanDir(f, 0);
		System.out.println("[\n" + tree.toString(4) + "\n]");

	}
}
