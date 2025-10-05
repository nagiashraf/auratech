import AppLayout from '@/layouts/app/AppLayout';
import { Category } from '@/types/types';

type HomeProps = {
  categories: Category[];
};

const Home = ({ categories }: HomeProps) => {
  return (
    <AppLayout categories={categories}>
      <h1 className="text-3xl font-bold">Hello, AuraTech!</h1>
    </AppLayout>
  );
};

export default Home;
