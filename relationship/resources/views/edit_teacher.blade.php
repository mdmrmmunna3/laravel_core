<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Form</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9;">
    <div
        style="background-color: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 400px; margin: auto;">
        <h2 style="text-align: center; color: #333;">Submit Your Information</h2>
        <!-- addTeacher are create and store data to the database method  -->
        <form action={{ route('editTeacher') }} method="POST">
            @csrf
            <input type="hidden" name="id" id="id" value={{ $teacher->id }}>
            <label for="name" style="font-size: 16px; color: #555;">Name:</label>
            <input type="text" id="name" name="name"
                style="width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;"
                placeholder="Enter Name" value="{{ $teacher->name }}">

            <label for="age" style="font-size: 16px; color: #555;">Age:</label>
            <input type="number" id="age" name="age"
                style="width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;"
                placeholder="Enter Age" value="{{ $teacher->age }}">

            <label for="phone_number" style="font-size: 16px; color: #555;">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number"
                style="width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;"
                placeholder="Enter Phone Number" value="{{$teacher->phone_number }}">

            <label for="speciality" style="font-size: 16px; color: #555;">Speciality:</label>
            <input type="text" id="speciality" name="speciality"
                style="width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px;"
                placeholder="Enter Speciality" value="{{ $teacher->speciality }}">

            <div style="text-align: center;">
                <button type="submit"
                    style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%;">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>

</html>