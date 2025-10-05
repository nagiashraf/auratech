import { Category } from '@/types/types';
import { Link } from '@inertiajs/react';
import 'swiper/css';
import 'swiper/css/navigation';
import { Navigation } from 'swiper/modules';
import { Swiper, SwiperSlide } from 'swiper/react';

type CategoriesNavbarProps = {
  categories: Category[];
};

const CategoriesNavbar = ({ categories }: CategoriesNavbarProps) => {
  if (categories.length === 0) {
    return null;
  }

  return (
    <nav className="container py-4 text-lg font-semibold">
      <Swiper
        navigation
        modules={[Navigation]}
        spaceBetween={16}
        breakpoints={{
          640: { spaceBetween: 24 },
          1024: { spaceBetween: 32 },
        }}
        slidesPerView={'auto'}
        loop={true}
        className="ps-9! pt-1!"
      >
        {categories.map((category) => (
          <SwiperSlide
            key={category.slug}
            className="relative! z-0! w-max! px-4! py-2! transition-transform! duration-300! before:absolute! before:start-0! before:top-0! before:-z-10! before:h-full! before:w-0! before:rounded-2xl! before:bg-linear-primary! before:transition-[width,translate]! before:duration-300! hover:-translate-y-0.5! hover:text-white! hover:before:w-full! hover:before:-translate-y-px!"
          >
            <Link href={`/categories/${category.slug}`}>{category.name}</Link>
          </SwiperSlide>
        ))}
      </Swiper>
    </nav>
  );
};

export default CategoriesNavbar;
