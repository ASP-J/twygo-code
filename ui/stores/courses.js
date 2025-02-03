import { defineStore } from 'pinia';
import { getCourse } from '~/services/api/course/courseService';

export const useCourses = defineStore('courses', {
  state: () => ({
    currentCourse: {},
  }),
  actions: {
    async getCourse(id) {
      this.currentCourse = await getCourse(id);
    },
    getVideoById(id) {
      return this.currentCourse?.videos?.find((video) => video.id === parseInt(id.toString())) || null;
    },
    async ensureCourse(id) {
      if (this.currentCourse?.id !== parseInt(id.toString())) {
        await this.getCourse(id);
      }
    },
  },
});