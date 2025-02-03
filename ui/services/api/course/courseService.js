export const getCourses = async (params) => {
  const response = await useAxios().get('/api/courses', { params });
  return {
    meta: response?.data?.meta,
    data: response?.data?.data,
  };
};

export const getCourse = async (id, params) => {
  const response = await useAxios().get(`/api/courses/${id}`, { params });
  return response?.data;
};

export const getCourseMetrics = async () => {
  const response = await useAxios().get(`/api/metrics`);
  return response?.data;
};

export const createCourse = async (data) => {
  return await useAxios().post(`/api/courses`, data, {
    headers: {
      'Content-Type': 'multipart/form-data',
    },
  });
};

export const updateCourse = async (id, data) => {
  return await useAxios().post(`/api/courses/${id}`, data, {
    headers: {
      'Content-Type': 'multipart/form-data',
    },
  });
};

export const deleteCourse = async (id) => {
  return await useAxios().delete(`/api/courses/${id}`);
};