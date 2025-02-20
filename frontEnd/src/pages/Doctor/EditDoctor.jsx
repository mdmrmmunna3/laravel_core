import React, { useEffect, useState } from "react";
import { useAxios } from "../../hooks/AxiosProvider";
import { useNavigate, useParams } from "react-router-dom";

const EditDoctor = () => {
    const { id } = useParams();
    const axiosInstant = useAxios();
    const navigate = useNavigate();
    const [editDoctor, setEditDoctor] = useState({
        name: "",
        email: "",
        phone: "",
        speciality: "",
    });

    // Fetch doctor data from API
    useEffect(() => {
        fetchDoctorData();
    }, [id]);

    const fetchDoctorData = async () => {
        try {
            const res = await axiosInstant.get(`doctors/${id}`);
            // console.log(res?.data);
            setEditDoctor(res?.data);
        } catch (error) {
            console.error("Error fetching doctor data:", error);
        }
    };

    // Handle input change
    const onChangeHandler = (event) => {
        const { name, value } = event.target;
        setEditDoctor((prev) => ({
            ...prev,
            [name]: value,
        }));
    };

    // Handle form submission
    const handleOnSubmit = async (event) => {
        event.preventDefault();
        try {
            await axiosInstant.put(`doctors/${id}`, editDoctor);
            navigate("/");
        } catch (err) {
            console.error("Update Failed:", err.message);
        }
    };

    return (
        <div className="flex justify-center items-center min-h-screen bg-gray-100">
            <form className="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg" onSubmit={handleOnSubmit}>
                <h2 className="text-center text-3xl font-bold mb-6 text-green-600">Edit Doctor</h2>
                <div className="space-y-6">
                    <div className="flex flex-col gap-2">
                        <label htmlFor="name" className="font-medium">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            className="border p-2 rounded"
                            placeholder="Enter doctor's name"
                            value={editDoctor?.name}
                            onChange={onChangeHandler}
                        />
                    </div>

                    <div className="flex flex-col gap-2">
                        <label htmlFor="email" className="font-medium">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            className="border p-2 rounded"
                            placeholder="Enter doctor's email"
                            value={editDoctor?.email}
                            onChange={onChangeHandler}
                        />
                    </div>

                    <div className="flex flex-col gap-2">
                        <label htmlFor="phone" className="font-medium">Phone</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            className="border p-2 rounded"
                            placeholder="Enter doctor's phone"
                            value={editDoctor?.phone}
                            onChange={onChangeHandler}
                        />
                    </div>


                    <div className="flex flex-col gap-2">
                        <label htmlFor="speciality" className="font-medium">Speciality</label>
                        <select
                            name="speciality"
                            id="speciality"
                            className="border p-2 rounded"
                            value={editDoctor.speciality}
                            onChange={onChangeHandler}
                        >
                            <option value="">Select Speciality</option>
                            <option value="Neurology">Neurology</option>
                            <option value="Orthopedic">Orthopedic</option>
                            <option value="Cardiology">Cardiology</option>
                        </select>
                    </div>

                    <button
                        type="submit"
                        className="w-full bg-green-600 py-3 text-white font-bold rounded-lg hover:bg-green-700 transition duration-200"
                    >
                        Edit Doctor
                    </button>
                </div>
            </form>
        </div>
    );
};

export default EditDoctor;