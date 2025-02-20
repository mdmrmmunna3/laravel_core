import React, { useState } from 'react';
import { useAxios } from '../../hooks/AxiosProvider';
import { useNavigate } from 'react-router-dom';

const InsertDoctor = () => {
    const axiosInstant = useAxios();
    const navigate = useNavigate();
    const [addDoctor, setAddDoctor] = useState({
        name: '',
        email: '',
        password: '',
        phone: '',
        speciality: '',
    });

    const onchangeHandler = (event) => {
        event.preventDefault();
        const { name, value } = event.target;
        setAddDoctor((doctorValues) => ({
            ...doctorValues,
            [name]: value
        }));
    }

    const handleSubmit = (event) => {
        event.preventDefault();
        axiosInstant.post('doctors', addDoctor)
            .then((res) => {
                navigate("/");
            })
            .catch((err) => {
                console.log(err);
            });
    }

    return (
        <div className="flex justify-center items-center min-h-screen bg-gray-100">
            <form className="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg" onSubmit={handleSubmit}>
                <h2 className="text-center text-3xl font-bold mb-6 text-green-600">Insert Doctor</h2>
                <div className="space-y-6">
                    <div className="flex flex-col gap-2">
                        <label htmlFor="name" className="font-medium">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            className="input-field"
                            placeholder="Enter doctor's name"
                            value={addDoctor.name}
                            onChange={onchangeHandler}
                        />
                    </div>

                    <div className="flex flex-col gap-2">
                        <label htmlFor="email" className="font-medium">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            className="input-field"
                            placeholder="Enter doctor's email"
                            value={addDoctor.email}
                            onChange={onchangeHandler}
                        />
                    </div>

                    <div className="flex flex-col gap-2">
                        <label htmlFor="phone" className="font-medium">Phone</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            className="input-field"
                            placeholder="Enter doctor's phone"
                            value={addDoctor.phone}
                            onChange={onchangeHandler}
                        />
                    </div>

                    <div className="flex flex-col gap-2">
                        <label htmlFor="password" className="font-medium">Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            className="input-field"
                            placeholder="Enter password"
                            value={addDoctor.password}
                            onChange={onchangeHandler}
                        />
                    </div>

                    <div className="flex flex-col gap-2">
                        <label htmlFor="speciality" className="font-medium">Speciality</label>
                        <select
                            name="speciality"
                            id="speciality"
                            className="input-field"
                            value={addDoctor.speciality}
                            onChange={onchangeHandler}
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
                        Insert Doctor
                    </button>
                </div>
            </form>
        </div>
    );
};

export default InsertDoctor;
