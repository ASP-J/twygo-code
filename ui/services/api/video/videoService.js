export const createVideo = async (data) => {
  return await useAxios().post(`/api/videos`, data, {
    headers: {
      'Content-Type': 'multipart/form-data',
    },
  });
};

export const updateVideo = async (id, data) => {
  return await useAxios().post(`/api/videos/${id}`, data, {
    headers: {
      'Content-Type': 'multipart/form-data',
    },
  });
};

export const deleteVideo = async (id) => {
  return await useAxios().delete(`/api/videos/${id}`);
};