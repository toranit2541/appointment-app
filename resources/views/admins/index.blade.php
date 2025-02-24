@extends('layouts.main')

@section('title', 'ผู้ดูแลระบบ')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-4">ผู้ใช้งานทั้งหมด</h1>

    @if(session('success'))
        <p class="text-green-600 bg-green-100 border border-green-400 p-2 rounded">{{ session('success') }}</p>
    @endif

    <a href="{{ route('admins.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        สร้างผู้ใช้งานใหม่
    </a>

    <div class="overflow-x-auto mt-4">
        <table class="w-full border-collapse border border-gray-400 mt-4">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 px-4 py-2">คำนำหน้า</th>
                    <th class="border border-gray-300 px-4 py-2">ชื่อ</th>
                    <th class="border border-gray-300 px-4 py-2">นามสกุล</th>
                    <th class="border border-gray-300 px-4 py-2">เลขบัตรประชาชน</th>
                    <th class="border border-gray-300 px-4 py-2">วัน-เดือน-ปี เกิด</th>
                    <th class="border border-gray-300 px-4 py-2">อีเมล</th>
                    <th class="border border-gray-300 px-4 py-2">อื่นๆ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">{{ $user->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->fname }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->lname }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->idcard }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ \Carbon\Carbon::parse($user->bday)->format('d/m/Y') }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                            <a href="{{ route('admins.show', $user->id) }}" class="text-blue-500 hover:underline">ตรวจสอบ</a>
                            <a href="{{ route('admins.edit', $user->id) }}" class="text-yellow-500 hover:underline">แก้ไข</a>
                            <form action="{{ route('admins.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบ?')">
                                    ลบ
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('admins.appointments') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 inline-block">
        ดูการจองทั้งหมด
    </a>
@endsection
