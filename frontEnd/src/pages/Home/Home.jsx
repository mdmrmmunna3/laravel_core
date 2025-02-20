import React, { useEffect, useState } from 'react';
import { useAxios } from '../../hooks/AxiosProvider';
import { Link } from 'react-router-dom';

const Home = () => {
    const [doctors, setDoctors] = useState([]);
    const axiosInstant = useAxios();

    const fetchDoctorData = async () => {
        try {
            const res = await axiosInstant.get('doctors');
            // console.log(res?.data);
            setDoctors(res?.data);
        }
        catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    useEffect(() => {
        fetchDoctorData();
    }, []);

    const handleDelete = (deleteId) => {
        // console.log(deleteId);
        axiosInstant.delete(`doctors/${deleteId}`)
            .then((res) => {
                fetchDoctorData();
            })
            .catch((err) => {
                console.log(err);
            });
    }

    return (
        <div className="p-6 bg-gray-50 min-h-screen">
            <h2 className="text-4xl font-semibold text-center text-green-600 mb-8">Doctors List</h2>

            <div className="overflow-x-auto shadow-lg rounded-lg bg-white">
                <table className="table-auto w-full text-center border-collapse">
                    {/* Table Head */}
                    <thead className="bg-green-500 text-white">
                        <tr>
                            <th className="py-3 px-6 text-sm font-medium">#</th>
                            <th className="py-3 px-6 text-sm font-medium">Name</th>
                            <th className="py-3 px-6 text-sm font-medium">Email</th>
                            <th className="py-3 px-6 text-sm font-medium">Password</th>
                            <th className="py-3 px-6 text-sm font-medium">Phone</th>
                            <th className="py-3 px-6 text-sm font-medium">Specialty</th>
                            <th className="py-3 px-6 text-sm font-medium">Actions</th>
                        </tr>
                    </thead>

                    {/* Table Body */}
                    <tbody>
                        {
                            doctors.length === 0 ? (
                                <tr>
                                    <td colSpan="7" className="text-center text-red-500 py-4">
                                        No data found
                                    </td>
                                </tr>
                            ) : (
                                doctors.map((doctor, index) => (
                                    <tr key={doctor?.id} className="border-b hover:bg-gray-100">
                                        <td className="py-4 px-6">{index + 1}</td>
                                        <td className="py-4 px-6">{doctor?.name}</td>
                                        <td className="py-4 px-6">{doctor?.email}</td>
                                        <td className="py-4 px-6">{doctor?.password}</td>
                                        <td className="py-4 px-6">{doctor?.phone}</td>
                                        <td className="py-4 px-6">{doctor?.speciality}</td>
                                        <td className="py-4 px-6 space-x-2">
                                            <Link to={`editDoctor/${doctor?.id}`} className="bg-blue-500 hover:bg-blue-600 px-4 py-2 text-white rounded-md">Edit</Link>
                                            <Link to={`viewDoctor/${doctor?.id}`} className="bg-slate-500 hover:bg-slate-600 px-4 py-2 text-white rounded-md">View</Link>
                                            <button onClick={() => handleDelete(doctor?.id)} className="bg-red-500 hover:bg-red-600 px-4 py-2 text-white rounded-md">Delete</button>
                                        </td>
                                    </tr>
                                ))
                            )
                        }
                    </tbody>
                </table>
            </div>
        </div>
    );
};

export default Home;
