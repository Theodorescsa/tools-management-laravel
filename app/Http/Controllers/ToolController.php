<?php

namespace App\Http\Controllers;

use App\Models\Tool;  // Import model Tool
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Hiển thị danh sách tất cả tools từ DB
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Lấy tất cả tools từ cơ sở dữ liệu
        $tools = Tool::all();

        // Trả về view và truyền dữ liệu tools vào view
        return view('tools.index', compact('tools'));
    }

    /**
     * Hiển thị thông tin chi tiết của một tool từ DB
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Lấy tool theo ID từ cơ sở dữ liệu
        $tool = Tool::find($id);

        // Nếu không tìm thấy tool, chuyển hướng về danh sách và thông báo lỗi
        if (!$tool) {
            return redirect()->route('tools.index')->with('error', 'Tool not found');
        }

        // Trả về view chi tiết và truyền dữ liệu tool vào view
        return view('tools.show', compact('tool'));
    }

    /**
     * Tạo tool mới
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tools.create');
    }

    /**
     * Lưu tool mới vào DB
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'project_name' => 'required|max:50',
            'url' => 'required|max:255',
            'params' => 'required|max:255',
            'tool_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Xác thực ảnh

        ]);
        // Xử lý tải lên ảnh
        $imagePath = null;
        if ($request->hasFile('tool_image')) {
            // Lưu hình ảnh vào thư mục 'tools_images'
            $imagePath = $request->file('tool_image')->store('tools_images', 'public');  // Lưu vào thư mục 'storage/app/public/tools_images'
        }
        // Lưu tool vào cơ sở dữ liệu
        Tool::create([
            'user_id' => 1,
            'name' => $validated['name'],
            'description' => $validated['description'],
            'project_name' => $validated['project_name'],
            'url' => $validated['url'],
            'params' => $validated['params'],
            'tool_image' => $imagePath,  // Lưu tên file hình ảnh
        ]);
        // Chuyển hướng về danh sách tools và thông báo thành công
        return redirect()->route('tools.index')->with('success', 'Tool created successfully!');
    }
}
