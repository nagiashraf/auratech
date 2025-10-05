import CategoriesNavbar from '@/layouts/app/CategoriesNavbar';
import MainNavbar from '@/layouts/app/MainNavbar';
import { Category } from '@/types/types';

type AppLayoutProps = {
  categories?: Category[];
  children: React.ReactNode;
};

const AppLayout = ({ categories, children }: AppLayoutProps) => {
  return (
    <>
      <header className="sticky top-0 z-50 bg-white/85 shadow-2xl/10 backdrop-blur-lg">
        <MainNavbar />
        {categories && <CategoriesNavbar categories={categories} />}
      </header>
      <main>{children}</main>
    </>
  );
};

export default AppLayout;
