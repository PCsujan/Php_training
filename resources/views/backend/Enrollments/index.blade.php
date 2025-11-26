<h2>Enrollments List</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Student</th>
        <th>Course</th>
        <th>Year</th>
        <th>Status</th>
    </tr>

    @foreach($enrollments as $e)
    <tr>
        <td>{{ $e->id }}</td>

        {{-- combine student_id + student name --}}
        <td>{{ $e->student->first_name }} {{ $e->student->last_name }}</td>

        {{-- combine course_id + course name --}}
        <td>{{ $e->course->course_name }}</td>

        <td>{{ $e->enrollment_year }}</td>
        <td>{{ $e->status }}</td>
    </tr>
    @endforeach
</table>
